<template>
    <div class="relative">
        <select @change="switchLanguage($event)" class="rounded-md border-gray-300">
            <option value="en">English</option>
            <option value="de">Deutsch</option>
        </select>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'

const switchLanguage = (event) => {
    router.get(route('language.switch', { language: event.target.value }))
}
</script>
