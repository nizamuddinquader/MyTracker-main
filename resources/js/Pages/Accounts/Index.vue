<template>
    <AppLayout>
        <div class="space-y-8">
            <!-- Header section -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400">
                        Manage Accounts
                    </h1>
                    <p class="text-slate-400 text-sm mt-1">
                        Create and monitor your financial accounts and current balances.
                    </p>
                </div>
                <!-- Add Account Button -->
                <button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-cyan-500 to-indigo-500 hover:from-cyan-400 hover:to-indigo-400 text-slate-950 font-bold rounded-xl text-sm transition-all duration-200 shadow-lg shadow-cyan-500/10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                    </svg>
                    Add New Account
                </button>
            </div>

            <!-- Stats Overview Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Combined Balance Widget -->
                <div class="relative bg-slate-900/60 backdrop-blur-xl border border-slate-800 rounded-2xl p-6">
                    <div class="absolute top-0 left-6 right-6 h-[1px] bg-gradient-to-r from-transparent via-cyan-500/30 to-transparent"></div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Net Worth</p>
                    <h3 class="text-3xl font-bold text-white mt-2">\$58,350.00</h3>
                    <p class="text-xs text-slate-500 mt-1">Combined assets from all accounts</p>
                </div>
            </div>

            <!-- Accounts Grid List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Loop over Accounts schema dynamic data -->
                <div v-for="account in accounts" :key="account.id" 
                    class="group relative bg-slate-900/40 backdrop-blur-xl border border-slate-800/80 rounded-2xl p-6 transition-all duration-300 hover:border-slate-700/80 hover:bg-slate-900/60">
                    
                    <!-- Top subtle visual light bar line on card hover -->
                    <div class="absolute top-0 left-6 right-6 h-[1px] bg-gradient-to-r from-transparent via-cyan-500/0 group-hover:via-cyan-400/40 to-transparent transition-all duration-300"></div>
                    
                    <div class="flex items-start justify-between gap-4">
                        <div class="space-y-1">
                            <!-- Account Name text -->
                            <h3 class="font-bold text-lg text-white group-hover:text-cyan-400 transition-colors">
                                {{ account.name }}
                            </h3>
                            <p class="text-xs text-slate-500">
                                Account ID: #{{ account.id }}
                            </p>
                        </div>
                        
                        <!-- Premium Tech Styled Icon Container -->
                        <div class="p-2.5 bg-slate-950/60 border border-slate-800 rounded-xl text-slate-400 group-hover:text-cyan-400 group-hover:border-cyan-500/30 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Account Balance Layout data row -->
                    <div class="mt-6 pt-4 border-t border-slate-800/60 flex items-baseline justify-between">
                        <span class="text-xs font-medium text-slate-500">Current Balance</span>
                        <span class="text-2xl font-black tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-indigo-400">
                            \${{ formatBalance(account.balance) }}
                        </span>
                    </div>

                    <!-- Dynamic Action Layer Options triggered on card interface -->
                    <div class="mt-5 flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <button class="px-2.5 py-1.5 bg-slate-950 hover:bg-slate-900 border border-slate-800 rounded-lg text-xs font-medium text-slate-400 hover:text-white transition-colors">
                            Edit
                        </button>
                        <button class="px-2.5 py-1.5 bg-slate-950 hover:bg-rose-950/30 border border-slate-800 hover:border-rose-900/50 rounded-lg text-xs font-medium text-slate-400 hover:text-rose-400 transition-colors">
                            Delete
                        </button>
                    </div>
                </div>

                <!-- Empty State UI (If no active accounts found) -->
                <div v-if="accounts.length === 0" class="col-span-full bg-slate-900/20 border border-dashed border-slate-800 rounded-2xl p-12 text-center">
                    <p class="text-slate-400 text-sm">No accounts found. Create your first asset wallet above.</p>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

// Accept core dynamic schema inputs sent from Laravel backend controller
defineProps({
    accounts: {
        type: Array,
        default: () => []
    }
});

// Helper configuration function to manage decimals gracefully
const formatBalance = (value) => {
    return Number(value).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
};
</script>
