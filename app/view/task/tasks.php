<?php
session_start();
include_once __DIR__ . '/../../controllers/ProjectController.php';
$title = 'Nom Project';
ob_start(); /*start buffering the output*/
?>

<div class="row">
    <h4 class="MERGE20">MY PROJECTS / PROJECT NAME<hr><br></h4>
    <!-- tab buttons -->
    <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'London')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg>  List</button>
            <button class="tablinks" onclick="openTab(event, 'Paris')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                </svg>  Table</button>
            <button class="tablinks" onclick="openTab(event, 'Tokyo')">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-list-nested" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5"/>
                </svg> RoadMap</button>
    </div>
    <div class="card">
        <div class="row">
            <div class="column-50">
            <button class="btn default" type="submit"> New Task</button>
            </div>
            <div class="column-50">
                <input type="text" id="myInput" onkeyup="Tabsearch()" placeholder="Search for names..">
            </div>
        </div>
            <!-- List -->
            <div id="London" class="tabcontent" style="display: block;">
            <h3>London</h3>
            <table id="myTable">
                <tr>
                    <th>Task</th>
                    <th width="30%" >Description</th>
                    <th>Periority</th>
                    <th>Assigne</th>
                    <th>Create at</th>
                    <th>State</th>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                <tr>
                    <td>Germany</td>
                    <td class="greyText">Alfreds Futterkiste</td>
                    <td style="color: red;">Hight</td>
                    <td>None</td>
                    <td>10/08/2024</td>
                    <td>done</td>
                </tr>
                </table>
            </div>

            <div id="Paris" class="tabcontent">
                <h3>Table Sucrum</h3>
                <div class="board">
                    <div class="column" id="todo">
                        <h2>To Do</h2>
                        <div class="task" draggable="true">Task 1</div>
                        <div class="task" draggable="true">Task 2</div>
                    </div>
                    <div class="column" id="inProcess">
                        <h2>In Process</h2>
                    </div>
                    <div class="column" id="done">
                        <h2>Done</h2>
                    </div>
                </div>
            </div>

            <div id="Tokyo" class="tabcontent">
            <h3>RoadMap</h3>
            <p>Soon...</p>
        </div>
    </div>
</div>




<?php
$content = ob_get_clean(); /*captured in the buffer and the buffer is cleared.*/
include '../layouts/master.php';
?>