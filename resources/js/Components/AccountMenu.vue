<script setup>
import {ref} from "vue";

const menu = ref(null);

const items= ref([
    {
        label: 'API Keys'
    },
    {
        label: 'Settings'
    },
    {
        separator: true
    },
    {
        label: 'Sign Out'
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
