<template>
    <div class="flex h-full w-full">
        <Toaster />

        <router-view v-slot="{ Component, route }">
            <div class="flex h-full w-full" :key="route.name">
                <Component :is="Component" />
            </div>
        </router-view>
    </div>
</template>

<script setup>
import { Toaster } from "vue-sonner";
</script>
