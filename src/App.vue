<!--
 - @copyright Copyright (c) 2020 Theo Felber <theo.felber@greendoor8.ch>
 -
 - @author Theo Felber <theo.felber@greendoor8.ch>
 -
 - @license GNU AGPL version 3 or any later version
 -
 - This program is free software: you can redistribute it and/or modify
 - it under the terms of the GNU Affero General Public License as
 - published by the Free Software Foundation, either version 3 of the
 - License, or (at your option) any later version.
 -
 - This program is distributed in the hope that it will be useful,
 - but WITHOUT ANY WARRANTY; without even the implied warranty of
 - MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 - GNU Affero General Public License for more details.
 -
 - You should have received a copy of the GNU Affero General Public License
 - along with this program. If not, see <http://www.gnu.org/licenses/>.
 -
 -->

<template>
  <Content :class="{'icon-loading': loading}" app-name="mymoney">
    <AppNavi />
   	<AppContent>
      <router-view />
   	</AppContent>
   </Content>
</template>

<script>
import Content from '@nextcloud/vue/dist/Components/Content'
import AppContent from '@nextcloud/vue/dist/Components/AppContent'

import AppNavi from './components/navigation/AppNavi'

export default {
	name: 'App',
	components: {
    Content,
		AppContent,
    AppNavi,
	},
}
</script>
