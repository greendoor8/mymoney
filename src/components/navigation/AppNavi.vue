<template>
  <AppNavigation>
    <AppNavigationNew v-if="!loading"
      :text="t('mymoney', 'Neue Buchung')"
      :disabled="false"
      button-id="new-mymoney-button"
      button-class="icon-add"
      @click="newButtonAction" />
      <template id="app-mymoney-navigation" #list>
        <AppNavigationItem :title="t('mymoney', 'Uebersicht')" icon="icon-home" :to="'/'" />
        <AppNavigationItem :title="t('mymoney', 'Alle Buchungen')" icon="icon-folder" :to="'/entries'" />
        <AppNavigationItem :title="t('mymoney', 'Wiederholungen')" icon="icon-folder" :to="'/recurrings'" />
        <AppNavigationItem :title="t('mymoney', 'Konten')" icon="icon-folder" :to="'/accounts'" />
        <AppNavigationItem :title="t('mymoney', 'Sparziele')" icon="icon-folder" :to="'/savinggoals'" />
        <AppNavigationItem :title="t('mymoney', 'Berichte')" icon="icon-folder" :to="'/reports'" />
      </template>
      <template id="app-mymoney-navigation-footer" #footer>
        <AppNavigationSettings :open="true">
          <div id="app-settings">
            Muss noch parametriert werden.
            <fieldset>
                <ul>
                    <li>
                        <input type="checkbox" class="checkbox" v-model="printImage" id="mymoney-param1">
                        <label for="mymoney-param1">
                            {{ t('mymoney', 'Mach was gescheites.') }}
                        </label>
                    </li>
                </ul>
            </fieldset>
          </div>
        </AppNavigationSettings>
      </template>
  </AppNavigation>
</template>

<script>
  import AppNavigation from '@nextcloud/vue/dist/Components/AppNavigation'
  import AppNavigationNew from '@nextcloud/vue/dist/Components/AppNavigationNew'
  import AppNavigationItem from '@nextcloud/vue/dist/Components/AppNavigationItem'
  import AppNavigationSettings from '@nextcloud/vue/dist/Components/AppNavigationSettings'

  export default {
  	name: 'AppNavi',
  	components: {
  		AppNavigation,
      AppNavigationNew,
      AppNavigationItem,
      AppNavigationSettings,
  	},
  }
</script>
