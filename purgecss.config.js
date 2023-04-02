module.exports = {
  content: ["static/css/purge/allPhpFiles.php"],
  css: [
    "./static/css/style.css",
    "./static/css/home.css",
    "./static/css/modifyStyle.css",
  ],
  output: [
    { file: "static/css/style.min.css", options: { minimize: true } },
    { file: "static/css/style.css" },
  ],
};
