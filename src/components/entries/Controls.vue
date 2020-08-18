<template>
	<div class="controls">
		<div class="title">
			<h2><a href="#">Buchungen</a></h2>
		</div>
	</div>
</template>

<script>

export default {
	name: 'Controls',
	methods: {
		toggleNav() {
			this.$store.dispatch('toggleNav')
		},
	},
}
</script>

<style lang="scss" scoped>
	.controls {
		display: flex;
		.title {
			display: flex;
			align-items: center;
			h2 {
				margin-left: 40px;
			}
		}
	}
</style>
