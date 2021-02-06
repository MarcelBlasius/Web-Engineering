export default{
	template: 
	`<ul :style="style"> <li style="padding-right:25px;" v-for="object in objects">{{object.name}}</li></ul>`
,
data() { 
	return {
	objects: {
		html: {name: "HTML"},
		css: {name: "CSS"},
		javascript: {name: "JavaScript"}
		},
}},
props: {
	vertical: {type: Boolean, default: false},
},

computed: {
	style(){ return {
		'display': "flex",
		'flex-direction': (this.vertical ? "column": "row" )
		}
	}
}
}