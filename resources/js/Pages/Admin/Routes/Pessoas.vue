<template>
<div class="flex justify-center w-full ">
    <label class="input w-1/2 min-w-96">
        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
        <input type="search" class="grow" placeholder="Search" />
        <kbd class="kbd kbd-sm">⌘</kbd>
        <kbd class="kbd kbd-sm">K</kbd>
    </label>
</div>
<table class="table">
    <!-- head -->
    <thead>
    <tr>
        <th>
        <label>
            <input type="checkbox" class="checkbox" />
        </label>
        </th>
        <th>Name</th>
        <th>Job</th>
        <th>Favorite Color</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <!-- row 1 -->
    <tr>
        <th>
        <label>
            <input type="checkbox" class="checkbox" />
        </label>
        </th>
        <td>
        <div class="flex items-center gap-3">
            <div class="avatar">
            <div class="mask mask-squircle h-12 w-12">
                <img
                src="https://img.daisyui.com/images/profile/demo/2@94.webp"
                alt="Avatar Tailwind CSS Component" />
            </div>
            </div>
            <div>
            <div class="font-bold">Hart Hagerty</div>
            <div class="text-sm opacity-50">United States</div>
            </div>
        </div>
        </td>
        <td>
        Zemlak, Daniel and Leannon
        <br />
        <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
        </td>
        <td>Purple</td>
        <th>
        <button class="btn btn-ghost btn-xs">details</button>
        </th>
    </tr>
    <!-- row 2 -->
    <tr>
        <th>
        <label>
            <input type="checkbox" class="checkbox" />
        </label>
        </th>
        <td>
        <div class="flex items-center gap-3">
            <div class="avatar">
            <div class="mask mask-squircle h-12 w-12">
                <img
                src="https://img.daisyui.com/images/profile/demo/3@94.webp"
                alt="Avatar Tailwind CSS Component" />
            </div>
            </div>
            <div>
            <div class="font-bold">Brice Swyre</div>
            <div class="text-sm opacity-50">China</div>
            </div>
        </div>
        </td>
        <td>
        Carroll Group
        <br />
        <span class="badge badge-ghost badge-sm">Tax Accountant</span>
        </td>
        <td>Red</td>
        <th>
        <button class="btn btn-ghost btn-xs">details</button>
        </th>
    </tr>
    <!-- row 3 -->
    <tr>
        <th>
        <label>
            <input type="checkbox" class="checkbox" />
        </label>
        </th>
        <td>
        <div class="flex items-center gap-3">
            <div class="avatar">
            <div class="mask mask-squircle h-12 w-12">
                <img
                src="https://img.daisyui.com/images/profile/demo/4@94.webp"
                alt="Avatar Tailwind CSS Component" />
            </div>
            </div>
            <div>
            <div class="font-bold">Marjy Ferencz</div>
            <div class="text-sm opacity-50">Russia</div>
            </div>
        </div>
        </td>
        <td>
        Rowe-Schoen
        <br />
        <span class="badge badge-ghost badge-sm">Office Assistant I</span>
        </td>
        <td>Crimson</td>
        <th>
        <button class="btn btn-ghost btn-xs">details</button>
        </th>
    </tr>
    <!-- row 4 -->
    <tr>
        <th>
        <label>
            <input type="checkbox" class="checkbox" />
        </label>
        </th>
        <td>
        <div class="flex items-center gap-3">
            <div class="avatar">
            <div class="mask mask-squircle h-12 w-12">
                <img
                src="https://img.daisyui.com/images/profile/demo/5@94.webp"
                alt="Avatar Tailwind CSS Component" />
            </div>
            </div>
            <div>
            <div class="font-bold">Yancy Tear</div>
            <div class="text-sm opacity-50">Brazil</div>
            </div>
        </div>
        </td>
        <td>
        Wyman-Ledner
        <br />
        <span class="badge badge-ghost badge-sm">Community Outreach Specialist</span>
        </td>
        <td>Indigo</td>
        <th>
        <button class="btn btn-ghost btn-xs">details</button>
        </th>
    </tr>
    </tbody>
    <!-- foot -->
    <tfoot>
    <tr>
        <th></th>
        <th>Name</th>
        <th>Job</th>
        <th>Favorite Color</th>
        <th></th>
    </tr>
    </tfoot>
</table>
</template>

<script>
    export default {}
</script>