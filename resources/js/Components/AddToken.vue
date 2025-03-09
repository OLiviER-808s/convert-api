<script setup>
import {ref} from "vue";
import {useForm} from "@inertiajs/vue3";

const visible = ref(false)

const form = useForm({
    name: '',
})

const submit = () => {
    form.post(route('tokens.store'), {
        onSuccess: () => visible.value = false,
    })
}
</script>

<template>
    <div>
        <Button label="Generate Token" @click="visible = true" />

        <Dialog v-model:visible="visible" modal header="Generate Token" :style="{ width: '30rem' }">
            <div class="flex items-center gap-4 mb-4">
                <label for="token_name" class="font-semibold w-24">Token Name</label>
                <InputText v-model="form.name" id="token_name" class="flex-auto" autocomplete="off" :invalid="!!form.errors?.name" />
            </div>

            <div class="text-sm mb-4">
                <Message v-if="form.errors.name" severity="error">
                    {{ form.errors.name }}
                </Message>
            </div>

            <div class="flex justify-end gap-2">
                <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
                <Button type="button" label="Save" @click="submit()"></Button>
            </div>
        </Dialog>
    </div>
</template>
