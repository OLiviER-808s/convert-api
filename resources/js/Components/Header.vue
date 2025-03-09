<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import {ref} from "vue";
import AccountMenu from "@/Components/AccountMenu.vue";
import {router} from "@inertiajs/vue3";

const items = ref([
    {
        label: 'Dashboard',
        command: () => router.visit(route('dashboard.show'))
    },
    {
        label: 'Documentation'
    }
])
</script>

<template>
    <div class="sticky top-0 z-10 w-full p-1">
        <Menubar :model="items">
            <template #start>
                <div class="w-10">
                    <ApplicationLogo />
                </div>
            </template>

            <template #end>
                <AccountMenu />
            </template>
        </Menubar>
    </div>
</template>
