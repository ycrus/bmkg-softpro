import "./bootstrap";
import "air-datepicker";
import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import '@fortawesome/fontawesome-free/css/all.css'

window.Alpine = Alpine;

Alpine.plugin(collapse);
Alpine.start();

app.use(express.static(__dirname + "/public/"));
