<template>
  <div id="file-select">
    <label>
      <span class="btn btn-sm btn-primary">
        <span v-if="value">Selected File: {{value.name}}</span>
        <span v-else>Select File</span>
      </span>
      <input type="file" @change="handleFileChange"/>
    </label>
  </div>
</template>

<script>
export default {
  props: {
    value: File,
  },

  methods: {
    handleFileChange(e) {
      this.$emit('input', e.target.files[0]);
    }
  }
}
</script>

<style scoped>
#file-select input[type="file"] {
  display: none;
}
.btn {
  cursor: pointer;
}
</style>