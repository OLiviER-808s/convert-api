<script setup>
import {ref} from "vue";

const visible = ref(false)
const token = ref('')

const name = ref('')
const error = ref('')

const submit = async () => {
    const response = await axios.post(route('tokens.store'), {
        name: name.value
    }).catch(err => {
        error.value = err.response.data.errors.name[0]
    })

    if (response) {
        error.value = ''
        token.value = response?.data.token
    }
}

const close = () => {
    visible.value = false
    token.value = ''
    name.value = ''
    error.value = ''
}
</script>

<template>
    <div>
        <Button label="Generate Token" @click="visible = true" />

        <Dialog v-model:visible="visible" modal :header="token ? 'Token Generated!' : 'Generate Token'" :style="{ width: '30rem' }">
            <div v-if="token" class="flex gap-2 mb-4">
                <InputText v-model="token" id="token_name" class="flex-grow" autocomplete="off" :invalid="!!error" />
                <Button icon="pi pi-copy" aria-label="Copy" />
            </div>
            <div v-else class="flex items-center gap-4 mb-4">
                <label for="token_name" class="font-semibold w-24">Token Name</label>
                <InputText v-model="name" id="token_name" class="flex-auto" autocomplete="off" :invalid="!!error" />
            </div>

            <div v-if="error" class="text-sm mb-4">
                <Message severity="error">
                    {{ error }}
                </Message>
            </div>

            <div v-if="token" class="flex justify-end gap-2">
                <Button type="button" label="Close" severity="secondary" @click="close()" />
            </div>
            <div v-else class="flex justify-end gap-2">
                <Button type="button" label="Cancel" severity="secondary" @click="close()" />
                <Button type="button" label="Save" @click="submit()" />
            </div>
        </Dialog>
    </div>
</template>
