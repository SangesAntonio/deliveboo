<template>
  <nav class="mt-3">
    <ul class="pagination">
      <li
        class="page-item"
        role="button"
        v-if="pagination.currentPage > 1"
        @click="$emit('on-page-change', pagination.currentPage - 1)"
      >
        <span class="page-link"><i class="fas fa-angle-left"></i></span>
      </li>
      <li
        class="page-item"
        v-for="page in pagination.lastPage"
        :key="page"
        :class="{ active: page === pagination.currentPage }"
        @click="$emit('on-page-change', page)"
        role="button"
      >
        <span class="page-link">{{ page }}</span>
      </li>
      <li
        class="page-item"
        role="button"
        v-if="pagination.lastPage > pagination.currentPage"
        @click="$emit('on-page-change', pagination.currentPage + 1)"
      >
        <span class="page-link" href="#"
          ><i class="fas fa-angle-right"></i
        ></span>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "Pagination",
  props: ["pagination"],
};
</script>

<style lang="scss">
</style>