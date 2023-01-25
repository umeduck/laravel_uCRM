<script setup>

import { Inertia } from '@inertiajs/inertia'

defineProps({
  id : String,
  item : Object
})

const deleteConfirm = id => {
  // console.log(id)
  Inertia.delete(`/inertia/${id}`, {
    onBefore: () => confirm('本当に削除しますか?')
  })
}

</script>

<template>
  {{  id   }}<br>
  {{ item.title }}<br>
  <button @click="deleteConfirm(item.id)">削除</button>

</template>