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
import App from './App'
import router from './router'
//import store from './store/main'
// import { sync } from 'vuex-router-sync'
import { translate, translatePlural } from '@nextcloud/l10n'
//import { generateFilePath } from '@nextcloud/router'
//import { showError } from '@nextcloud/dialogs'
//import { Tooltip } from '@nextcloud/vue'
//import ClickOutside from 'vue-click-outside'
//import './models'

// the server snap.js conflicts with vertical scrolling so we disable it
//document.body.setAttribute('data-snap-ignore', 'true')

// eslint-disable-next-line
//__webpack_nonce__ = btoa(OC.requestToken)
// if (!process.env.HOT) {
// 	// eslint-disable-next-line
// 	__webpack_public_path__ = generateFilePath('mymoney', '', 'js/')
// }
//sync(store, router)

Vue.prototype.t = translate
Vue.prototype.n = translatePlural

// Vue.directive('tooltip', Tooltip)
//Vue.directive('click-outside', ClickOutside)

// Vue.directive('focus', {
// 	inserted(el) {
// 		el.focus()
// 	},
// })

// Vue.config.errorHandler = (err, vm, info) => {
// 	if (err.response && err.response.data.message) {
// 		const errorMessage = t('mymoney', 'Something went wrong')
// 		showError(`${errorMessage}: ${err.response.data.status} ${err.response.data.message}`)
// 	}
// 	console.error(err)
// }

/* eslint-disable-next-line no-new */
// new Vue({
// 	el: '#app',
// 	router,
// 	// store,
// 	// data() {
// 	// 	return {
// 	// 		time: Date.now(),
// 	// 		interval: null,
// 	// 	}
// 	// },
// 	// created() {
// 	// 	// eslint-disable-next-line
// 	// 	new OCA.Search(this.filter, this.cleanSearch)
// 	// 	this.interval = setInterval(() => {
// 	// 		this.time = Date.now()
// 	// 	}, 1000)
// 	// },
// 	// beforeDestroy() {
// 	// 	clearInterval(this.interval)
// 	// },
// 	// methods: {
// 	// 	filter(query) {
// 	// 		this.$store.commit('setSearchQuery', query)
// 	// 	},
// 	// 	cleanSearch() {
// 	// 		this.$store.commit('setSearchQuery', '')
// 	// 	},
// 	// },
// 	render: h => h(App),
// })


export default new Vue({
	el: '#content',
	router,
	render: h => h(App),
})
