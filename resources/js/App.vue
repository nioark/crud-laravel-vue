<template>
    <div class="flex h-full w-full ">

        <router-view  v-slot="{ Component, route }">
            <div class="flex h-full w-full" :key="route.name">
                <Component :is="Component" />
            </div>
        </router-view>
    </div>
</template>