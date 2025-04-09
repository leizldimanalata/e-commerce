import "./bootstrap";
import Swal from "sweetalert2";
import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";

window.Alpine = Alpine;
window.Swal = Swal;
Alpine.plugin(collapse);
Alpine.start();
