<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import AddToken from "@/Components/AddToken.vue";

const props = defineProps({
    hasTokens: Boolean,
})
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout>
        <div class="pt-10">
            <div v-if="hasTokens">

            </div>
            <div v-else class="flex justify-center">
                <div class="flex flex-col items-center">
                    <h1 class="text-lg mb-4">Get started by generating an API token!</h1>

                    <AddToken />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
