<script setup>
import {ref} from "vue";
import {router} from "@inertiajs/vue3";

const menu = ref(null);

const items= ref([
    {
        label: 'API Tokens',
        command: () => router.visit(route('tokens.index'))
    },
    {
        label: 'Settings'
    },
    {
        separator: true
    },
    {
        label: 'Sign Out',
        command: () => router.post(route('logout'))
    }
])

const toggle = (event) => {
    menu.value.toggle(event);
}
</script>

<template>
    <div>
        <Button
            label="Account"
            icon="pi pi-chevron-down"
            iconPos="right"
            severity="secondary"
            variant="text"
            aria-haspopup="true"
            aria-controls="account_menu"
            @click="toggle"
        />

        <Menu ref="menu" id="account_menu" :model="items" :popup="true" />
    </div>
</template>
