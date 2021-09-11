<template>
    <div>
        <label :for="item.id" class="form-label d-block">
            {{ item.label }}
            <small class="float-end" v-if="item.description">{{ item.description }}</small>
        </label>
        <input :type="item.type" class="form-control" :id="item.id" v-model="item.value" :disabled="disabled"/>
        <div class="invalid-feedback" v-show="item.errors">
            <div v-for="(error, i) in item.errors" :key="i">{{ error }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        item: Object,
        disabled: Boolean
    }
}
</script>
<style>
    .invalid-feedback {
        display: inline-block !important;
    }

    label small {
        color: #7a7a7a;
    }
</style>
