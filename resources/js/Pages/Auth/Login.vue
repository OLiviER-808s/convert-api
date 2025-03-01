<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="flex justify-center items-center min-h-screen">
        <Card class="w-full max-w-md">
            <template #title> Login </template>

            <template #content>
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium">
                            Email
                        </label>
                        <InputText v-model="form.email" id="email" class="w-full" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium">
                            Password
                        </label>
                        <Password v-model="form.password" :feedback="false" id="password" :pt="{ pcInputText: 'w-full' }" />
                    </div>

                    <Message v-if="form.errors.email || form.errors.password" severity="error">
                        {{ form.errors.email || form.errors.password }}
                    </Message>

                    <Button type="submit" label="Login" class="w-full" :loading="form.processing" />
                </form>
            </template>
        </Card>
    </div>
</template>
