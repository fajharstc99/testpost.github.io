<template>
    <admin-layout>
        <li v-for="(permission, index) in permissions">
            <input type="checkbox" :value="permission.id" :id="permission.id" :checked="props.rolePermissions">
            <label :for="permission.id">{{ permission.name }}</label>
        </li>
    </admin-layout>
</template>


<script setup>
    import AdminLayout from "@/Layouts/AdminLayout";
    import { useForm } from "@inertiajs/inertia-vue3";
    import { Link, Head } from "@inertiajs/inertia-vue3";
    import { Inertia } from "@inertiajs/inertia";


    const props = defineProps({
        role: Object,
        permissions: Object,
        rolePermissions: Array,
    });
</script>

