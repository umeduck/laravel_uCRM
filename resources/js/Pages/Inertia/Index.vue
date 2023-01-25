<script setup>
import { Link } from '@inertiajs/inertia-vue3';
defineProps({
  items: Array
})
</script>
<template>
  <div v-if="$page.props.flash.message" class="bg-blue-200">
    {{ $page.props.flash.message }}
  </div>

  <ul>
    <li v-for="item in items" :key="item.id">
      件名: <Link :href="route('inertia.show', { id: item.id})" class="text-blue-400">{{ item.title }}</Link>
      本文: {{ item.content }}
    </li>

  </ul>

</template>