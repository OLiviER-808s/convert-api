<script setup>
import {ref} from "vue";
import {useClipboard} from "@vueuse/core";
import {useToast} from "primevue";

const visible = ref(false)
const token = ref('')

const name = ref('')
const error = ref('')

const toast = useToast()
const clipboard = useClipboard({ token })

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

const copyToken = () => {
    clipboard.copy(token.value)
    toast.add({ severity: 'success', summary: 'Token copied to clipboard', life: 3000 });
}
</script>

<template>
    <div>
        <Toast />

        <Button label="Generate Token" @click="visible = true" />

        <Dialog v-model:visible="visible" modal :header="token ? 'Token Generated!' : 'Generate Token'" :style="{ width: '30rem' }">
            <div v-if="token" class="mb-4">
                <label for="token" class="font-semibold">Token</label>

                <div class="flex gap-2">
                    <InputText v-model="token" id="token" class="flex-grow" autocomplete="off" disabled />
                    <Button icon="pi pi-copy" aria-label="Copy" @click="copyToken()" />
                </div>
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
