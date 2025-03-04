<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import {ref} from "vue";

const items = ref([
    {
        label: 'Dashboard',
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

            </template>
        </Menubar>
    </div>
</template>
