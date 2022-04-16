//import { mivariable } from './miarchivo.js'

document.addEventListener('DOMContentLoaded', (event) => {
	const vue_app = Vue.createApp({
		data(){
			return {
				codigo_articulo: 0,
				search: {  },
				titulo: '',
				articulo: '',
				autor: 'Daniel Canache. A. V.',
				fecha: Date()
			}
		},
		mounted(){
			const search = location.search
			this.desglosarBusqueda();
			this.mostrarArticulo(this.search.entrada);
		},
		methods:{
			desglosarBusqueda(){
				if (location.search === ''){
					this.search['entrada'] = 'introduccion';
					return;
				}
				const search = location.search.split('?')[1];
				const entradas = search.split('&')
				
				entradas.forEach(element =>{
					const arg = element.split('=');
					this.search[arg[0]] = arg[1];
				});
			},

			async obtenerArticulo(){
				const url = `${location.origin}/articulo.php`;
				const query = `?entrada=${this.search['entrada']}`;
				var res = {  };

				await fetch(url + query, {
					method:'get'
				}).then(response => {
					return response.json();
				}).then(data => {
					res['titulo'] = data.titulo;
					res['articulo'] = data.articulo;
				});
				
				return res;
			},

			async mostrarArticulo(entrada) {
					this.search.entrada = entrada;
					const res = await this.obtenerArticulo();
					this.titulo = res.titulo;
					this.articulo = res.articulo;
			},

			toast(mensaje){
				console.log(mensaje);
			},

			comentar() {
				const form = document.forms[0]
				const formulario = new FormData(form);
				formulario.append('nombreArticulo', this.codigo_articulo);
				fetch(
					form.action,
					{
						body: formulario,
						method: 'post',
					}).then((response) =>{
						return response.text();
					}).then(data => {
						console.log(data);
					});
			}
		}
	});

	vue_app.mount('#app');
})
