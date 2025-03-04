<script setup>
import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AppLayout>
        <div class="flex justify-center items-center pt-10">
            <Card class="w-full max-w-md">
                <template #title> Register </template>

                <template #content>
                    <form @submit.prevent="submit" class="space-y-4">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium"> Name </label>
                            <InputText v-model="form.name" id="name" class="w-full" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium"> Email </label>
                            <InputText v-model="form.email" id="email" class="w-full" />
                        </div>

                        <!-- Password -->
                        <div class="w-full">
                            <label for="password" class="block text-sm font-medium"> Password </label>
                            <Password v-model="form.password" id="password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="w-full">
                            <label for="password_confirmation" class="block text-sm font-medium">
                                Confirm Password
                            </label>
                            <Password
                                v-model="form.password_confirmation"
                                id="password_confirmation"
                                :feedback="false"
                            />
                        </div>

                        <!-- Terms Checkbox -->
                        <div class="flex items-center gap-2">
                            <Checkbox v-model="form.terms" id="terms" :binary="true" />
                            <label for="terms" class="text-sm"> I agree to the terms and conditions </label>
                        </div>

                        <!-- Error Messages -->
                        <Message v-if="form.errors.email || form.errors.password || form.errors.name" severity="error">
                            {{ form.errors.email || form.errors.password || form.errors.name }}
                        </Message>

                        <!-- Submit Button -->
                        <Button type="submit" label="Register" class="w-full" :loading="form.processing" />
                    </form>
                </template>
            </Card>
        </div>
    </AppLayout>
</template>
