/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./application/Views/**/*.php",
		"./public/**/*.html",
		"./node_modules/flowbite/**/*.js",
	],
	theme: {
		extend: {
			fontFamily: {
				poppins: ["Poppins", "sans-serif"],
				quicksand: ["Quicksand", "sans-serif"],

				roboto: ["Roboto", "sans-serif"],
				exo2: ["Exo 2", "sans-serif"],
			},
			colors: {
				warna: {
					100: "#f2f2f2",
					200: "#9cd3d8",
					300: "#0396a6",
					400: "#0b698b",
				},
			},
			screens: {
				xs: "375px",
			},
		},
	},
	plugins: [require("flowbite/plugin")],
};
