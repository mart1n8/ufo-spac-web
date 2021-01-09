<template>
<div>
  <div class="min-h-screen bg-gray-100 max-w-7xl mx-auto">
    <header class="h3 flex align-middle py-2">
      <img src="https://www.ufospacince.sk/sites/default/files/novelogo_2.png" class="h-24 float-left pl-8 pr-12" />
      <span class="mb-auto mt-auto text-5xl text-blue-900 font-serif font-semibold italic">U.F.O. Špačince - ultimate frisbee team</span>
    </header>

    <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-blue-900 rounded">
      <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto px-4 lg:static lg:block lg:justify-start">
          <a class="text-sm font-bold leading-relaxed inline-block mr-8 py-2 whitespace-no-wrap uppercase text-white hover:text-indigo-100 hover:underline" :href="route('/')"> HOME </a>
          <a class="text-sm font-bold leading-relaxed inline-block mr-8 py-2 whitespace-no-wrap uppercase text-white hover:text-indigo-100 hover:underline" href="#pablo"> TEAM </a>
          <a class="text-sm font-bold leading-relaxed inline-block mr-8 py-2 whitespace-no-wrap uppercase text-white hover:text-indigo-100 hover:underline" href="#pablo"> KALENDAR </a>
          <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button">
            <span class="block relative w-6 h-px rounded-sm bg-white"></span>
            <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
            <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
          </button>
        </div>
        <div class="flex lg:flex-grow items-center" id="example-navbar-info">
          <ul class="flex flex-col lg:flex-row list-none ml-auto">
            <li class="nav-item">
              <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo"> Discover </a>
            </li>
            <li class="nav-item">
              <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo"> profile </a>
            </li>
            <li class="nav-item">
              <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo"> Settings </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="flex h-screen bg-white">
    <aside class="w-64 w-max-64 pl-2 pt-2 pr-2 bg-gray-50">
     <fieldset class="border-2 text-center p-2">
        <legend class="px-2 text-blue-900 text-left font-medium text-2xl">Facebook:</legend>
        <div class="fb-page" data-href="https://www.facebook.com/ufospacince/" data-tabs="timeline"  data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/tjspacince/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/tjspacince/">TJ Družstevník Špačince</a></blockquote></div>
     </fieldset>
    </aside>

    <main class="w-auto pt-2 pl-5 pr-5 pb-40">
      <slot></slot>
    </main>

    </section>

  </div>
</div>

</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
