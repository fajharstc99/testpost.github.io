<template>
    <admin-layout>
        <div>Ini Halaman Biodata Member</div>
    </admin-layout>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/Layouts/AdminLayout";
export default {
    created() {
        document.title = "Biodata Member";
    },
    components:{
        AdminLayout,
        Link     
    },
}
</script>
    AdminLayout