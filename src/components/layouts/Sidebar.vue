<template>
	<ul :class="['navbar-nav bg-gradient-primary sidebar sidebar-dark accordion', sidebarClass]" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
			<div class="sidebar-brand-icon rotate-n-15">
				<i class="fas fa-book"></i>
			</div>
			<div class="sidebar-brand-text mx-3">De Siakad <sup><i class="fas fa-heart rotate-15"></i></sup></div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider">
		
		<!-- Heading -->
		<div class="sidebar-heading">
			Daftar Data
		</div>

		<!-- Nav Item - Dashboard -->
		<li class="nav-item my-0" 
			v-for="nav in parentNavs" 
			:key="'parentnav'+nav.id"
		>
			<router-link class="nav-link" 
				:to="nav.link" 
				v-if="nav.link !== '#'"
			>
				<i :class="['fas fa-fw', nav.icon]"></i>
				<span>{{ nav.nama }}</span>
			</router-link>

			<a class="nav-link collapsed" data-toggle="collapse" aria-expanded="true" 
				:data-target="'#collapse' + nav.id" 
				:aria-controls="'heading' + nav.id" 
				v-if="nav.link == '#'"
			>
				<i :class="['fas fa-fw', nav.icon]"></i>
				<span>{{ nav.nama }}</span>
			</a>

			<div class="collapse" data-parent="#accordionSidebar" 
				:id="'collapse' + nav.id" 
				:aria-labelledby="'heading' + nav.id"
			>
				<div class="py-2 collapse-inner rounded" style="background-color: rgba(255,255,255, 0.2);">
					<h6 class="collapse-header text-white-50">{{ nav.nama }}</h6>
					<router-link class="collapse-item text-white"
						v-for="subnav in childNavs(nav.id)"
						:key="'subnav'+subnav.id"
						:to="subnav.link"
					>
						<i :class="['text-white-50 fas fa-fw', subnav.icon]"></i>
						{{ subnav.nama }}
					</router-link>
				</div>
			</div>
		</li>


		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle" @click="toggleSidebar()"></button>
		</div>

	</ul>
</template>

<script>
	export default {
		name: 'Sidebar',
		data: () => ({
			sidebarClass: '',
			navs: [],
		}),
		methods: {
			toggleSidebar() {
				this.$store.dispatch("toggleSidebar", !this.sidebarToggle);
			},
			getNavs() {
				this.$axios.get(`${this.$url}/menu`).then((response) => {
					this.navs = response.data;
				});
			},
			childNavs(parentId) {
				return this.navs.filter((nav) => {
					return nav.submenu == parentId;
				});
			},
		},
		computed: {
			sidebarToggle() {
				return this.$store.state.sidebarToggle;
			},
			parentNavs() {
				return this.navs.filter((nav) => {
					return nav.submenu == 0;
				});
			},
		},
		watch: {
			sidebarToggle(val) {
				var className = 'sidebar-toggled';
				if (val) {
					document.body.classList.add(className);
					this.sidebarClass = 'toggled';
				} else {
					document.body.classList.remove(className);
					this.sidebarClass = '';
				}
			}
		},
		created() {
			this.getNavs();
		}
	}
</script>