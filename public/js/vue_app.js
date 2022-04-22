//import { mivariable } from './miarchivo.js'

document.addEventListener('DOMContentLoaded', (event) => {
	const vue_app = Vue.createApp({
		data(){
			return {
				search: {  },
				titulo: '',
				articulo: '',
				autor: '',
				fecha: ''
			}
		},
		mounted(){
			this.desglosarBusqueda();
			this.mostrarArticulo(this.search.entrada);
		},
		methods:{
			desglosarBusqueda(){
				if (location.search === ''){
					this.search['entrada'] = 'introduccion';
					return;
				}
				const search = location.pathname.split('/')[1];
			},

			async obtenerArticulo(){
				const url = `${location.origin}/api/${this.search['entrada']}`;
				var res = {  };
				console.log('pulsado');
				await fetch(url, {
					method:'get'
				}).then(response => {
					return response.json();
				}).then(data => {
					if ('error' in data){
						this.toast('Error in fetch');
						throw data;
						return;
					}
					Object.keys(data).forEach(key =>{
						res[key] = data[key];
					});
				});
				
				return res;
			},

			async mostrarArticulo(entrada) {
					this.search.entrada = entrada;
					try{
						const res = await this.obtenerArticulo();
						if (res){
							this.titulo = res.titulo;
							this.articulo = res.articulo;
							this.fecha = res.fecha;
							this.autor = res.autor;
							return;
					
						}


					}catch(e){
						this.toast(e.message);
			
					}
			},

			toast(mensaje){
				console.log(mensaje);
			},
		}
	});

	vue_app.mount('#app');
})
