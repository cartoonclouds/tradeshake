<!-- Please remove this file from your project -->
<template>
  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="mt-8 bg-white overflow-hidden shadow sm:rounded-lg p-6">
        <div class="flex place-content-between">
          <h2 class="text-2xl leading-7 font-semibold">
            {{ title }}
          </h2>

          <NuxtLink to="/users/create">
            <button type="button"
              class="ml-8 px-4 py-2 font-semibold bg-sky-500 text-white rounded-none shadow-sm">Create User</button>
          </NuxtLink>
        </div>

        <table class="table-auto mt-4">
          <thead>
            <tr>
              <th class="p-2">ID</th>
              <th class="p-2">Name</th>
              <th class="p-2">Email</th>
              <th class="p-2">Notes</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" class="hover:bg-slate-300">
              <td class="p-2 text-blue-600">
                <NuxtLink :to="`/users/${user.id}`">
                  {{ user.id }}
                </NuxtLink>
              </td>
              <td class="p-2">{{ user.name }}</td>
              <td class="p-2">{{ user.email }}</td>
              <td class="p-2">{{ user.notes }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Users',
  props: ['users', 'title']
}
</script>
