let close;
function mem_window() {
    document.getElementById('modal_mem').style="display: flex; position: fixed; z-index: 11111111;";
    document.getElementById('close_btn').style="display: block;";
    document.getElementById('header').style="position: fixed;"
    
    if (close == true) {
        document.getElementById('modal_mem').style="display: none;";
        document.getElementById('close_btn').style="display: none;";
        document.getElementById('header').style="position: relative"
        close = false;
    } else {
        close = true;
    }
}