<template>
    <aside class="flex flex-col w-64 h-screen p-2 bg-gray-800"
        v-if="openNav"
    >
        <!-- logo -->
        <div class="flex flex-col items-center">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>                   
                <span class="ml-2 text-2xl font-mono font-bold text-gray-300">AD</span>
                <span class="text-2xl font-mono font-bold text-gray-400">MIN</span>
            </div>    

            <div class="mt-2 flex items-center">
                <span class="text-sm font-sans font-bold text-gray-200">
                    Halaman Administrator
                </span>
            </div>
        </div>

        <hr class="border-gray-600 mt-2">

        <div class="overflow-auto h-screen flex flex-col justify-between flex-1 mt-1">
            <nav>
                <div class="nav-item mb-1">
                    <Link
                        :href="route('dashboard')"
                        class="nav-item"
                        :class="
                            route().current('dashboard')    
                            ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                            : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                        "
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                        </svg>  
                        <span class="ml-2 font-medium">Dashboard Public</span>       
                    </Link>      
                </div><hr />
                
                <!--div v-if="$page.props.user.is_admin"-->
                <div v-if="can('manage super-admin')">

                    <!-- administrator -->
                    <div class="item-center mt-2 text-white mx-2 font-medium">
                        <span class="font-bold">Master Data</span>
                    </div>

                    <!-- roles -->
                    <div class="nav-item mb-1">
                        <Link
                            :href="route('admin.roles.index')"
                            class="nav-item"
                            :class="
                                route().current('admin.roles.*')    
                                ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                                : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                            "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>  
                            <span class="ml-2 font-medium">Roles</span>  
                        </Link>        
                    </div>

                    <!-- permisssions -->
                    <div class="nav-item mb-1">
                        <Link
                            :href="route('admin.permissions.index')"
                            class="nav-item"
                            :class="
                                route().current('admin.permissions.*')    
                                ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                                : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                            "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                            </svg>  
                            <span class="ml-2 font-medium">Permisssions</span>    
                        </Link>     
                    </div>
                    
                </div><hr />

                <div v-if="can('manage super-admin') | can('manage admin')">
                    <div class="item-center mt-2 text-white mx-2 font-medium">
                        <span class="font-bold">Olah Data</span>
                    </div>
                    
                    <div class="nav-item mb-1">
                        <Link
                            :href="route('admin.beritas.index')"
                            class="nav-item"
                            :class="
                                route().current('admin.beritas.*')    
                                ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                                : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                            "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg> 
                            <span class="ml-2 font-medium">Berita</span>    
                        </Link>  
                    </div>

                    <div class="nav-item mb-1">
                        <Link
                            :href="route('admin.informasi-dikecualikans.index')"
                            class="nav-item"
                            :class="
                                route().current('admin.informasi-dikecualikans.*')    
                                ? 'flex items-center px-2 py-1 text-white rounded-md bg-blue-600'
                                : 'flex items-center px-2 py-1 text-white transition-colors duration-200 transform rounded-md hover:bg-blue-600'
                            "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg> 
                            <span class="ml-2 font-medium">Informasi Dikecualikan</span>    
                        </Link>  
                    </div>
                </div>
                
            </nav>
        </div>
    </aside>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3"
export default {
    components: {
        Link
    },
    props: ["openNav"],
    methods: {
        can(permission) {
            if (this.$page.props.auth.user.is_admin) return true;
            return this.$page.props.auth.user.permissions.includes(permission);
        }
    }
}
</script>