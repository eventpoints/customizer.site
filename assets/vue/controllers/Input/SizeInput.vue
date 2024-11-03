<template>
  <div>
    <label class="fw-bold text-muted text-capitalize" :for="id">{{ label }}</label>
    <div class="input-group w-100">
      <!-- Number input for the size value -->
      <input
          type="text"
          class="form-control"
          v-model.number="sizeValue"
          @input="emitCombinedSize"
          aria-label="Size value input"
          placeholder="Size"
      />
      <button
          class="btn btn-light dropdown-toggle"
          type="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
      >
        {{ sizeUnit }}
      </button>

      <!-- Dropdown menu for selecting a unit -->
      <ul class="dropdown-menu dropdown-menu-end">
        <li
            v-for="unit in units"
            :key="unit"
            @click="selectUnit(unit)"
        >
          <a class="dropdown-item" href="#">{{ unit }}</a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "SizeInput",
  props: {
    id: String,
    label: String,
    modelValue: {
      type: String,
      default: "0.375",
    },
  },
  data() {
    return {
      units: ["px", "%", "em", "rem", "vw", "vh"], // List of CSS units
      sizeValue: 0.375,
      sizeUnit: "rem",
    };
  },
  watch: {
    modelValue: {
      immediate: true,
      handler(newValue) {
        const match = newValue.match(/^([\d.]+)(\D+)$/);
        if (match) {
          this.sizeValue = parseFloat(match[1]);
          this.sizeUnit = match[2];
        }
      },
    },
  },
  methods: {
    emitCombinedSize() {
      this.$emit("update:modelValue", `${this.sizeValue}${this.sizeUnit}`);
    },
    selectUnit(unit) {
      this.sizeUnit = unit;
      this.emitCombinedSize();
    },
  },
};
</script>

<style scoped>
</style>
