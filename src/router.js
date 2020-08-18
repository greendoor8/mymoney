/*
 * @copyright Copyright (c) 2020 Theo Felber <theo.felber@greendoor8.ch>
 *
 * @author Theo Felber <theo.felber@greendoor8.ch>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

import Vue from 'vue'
import Router from 'vue-router'
import { generateUrl } from '@nextcloud/router'
//import { BOARD_FILTERS } from './store/main'
// import Boards from './components/boards/Boards'
// import Board from './components/board/Board'
// import Sidebar from './components/Sidebar'
// import BoardSidebar from './components/board/BoardSidebar'
// import CardSidebar from './components/card/CardSidebar'
import App from './App'
import HomeIndex from './components/HomeIndex'
import AccountsIndex from './components/accounts/AccountsIndex'
import AccountsView from './components/accounts/AccountsView'
import EntriesIndex from './components/entries/EntriesIndex'
import RecurringsIndex from './components/recurrings/RecurringsIndex'
import ReportsIndex from './components/reports/ReportsIndex'
import SavinggoalsIndex from './components/savinggoals/SavinggoalsIndex'

Vue.use(Router)

export default new Router({
	base: generateUrl('/apps/mymoney/'),
	linkActiveClass: 'active',
	routes: [
		{
			path: '/',
			name: 'home',
			component: HomeIndex,
		},
		{
			path: '/accounts',
			name: 'accountsIndex',
			component: AccountsIndex,
		},
		{
			path: '/accounts/:id',
			name: 'accountsView',
			component: AccountsView,
		},
		{
			path: '/entries/',
			name: 'entriesIndex',
			component: EntriesIndex,
		},
		{
			path: '/recurrings/',
			name: 'recurringsIndex',
			component: RecurringsIndex,
		},
		{
			path: '/reports/',
			name: 'reportsIndex',
			component: ReportsIndex,
		},
		{
			path: '/savinggoals/',
			name: 'savinggoalsIndex',
			component: SavinggoalsIndex,
		},
	],
})
