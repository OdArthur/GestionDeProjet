<!DOCTYPE html>
<!-- saved from url=(0056)https://colorlib.com/etc/bootstrap-sidebar/sidebar-03/?# -->
<html lang="en" data-lt-installed="true">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>OCC</title>
    <link rel="shortcut icon" href="../Assets/IconOCC.png" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <style type="text/css">
    body { padding: 0px; margin: 0px; background-color: #ffffff; }
    a { color: #1155a3; }
    .space { margin: 10px 0px 10px 0px; }
    .header { background: #003267; background: linear-gradient(to right, #011329 0%, #00639e 44%, #011329 100%); padding: 20px 10px; color: white; box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.75); }
    .header a { color: white; }
    .header h1 a { text-decoration: none; }
    .header h1 { padding: 0px; margin: 0px; }
    .main { padding: 10px; margin-top: 10px; }
  </style> -->

    <script src="../view/Gantt/js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

</head>

<body class="d-inline">
    <div class="wrapper d-flex align-items-stretch">

        <?php
        include __DIR__ . '/../Sidebar.php';
        ?>

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Project: <?= $WorkingProject[0]['Title'] ?> managed by <?= $WorkingUser[0]['Username'] ?>
            </h2>
            <hr>
            <p>
                <?= $WorkingProject[0]['Description'] ?>
            </p>

            <div id=main>
                <div id="dp"></div>
            </div>

            <hr>
            <!-- <h3 class="mb-4">Your Task on this Projet</h3>
            <h4 class="mb-4">Task name: Time start - Time end</h4> -->

            <div class="footer align-bottom">
                <div class="d-flex flex-row justify-content-around align-items-end bd-highlight mb-3">
                    <form method="POST" action="editproject.php">
                        <button class="btn btn-primary" name="Edit">Edit</button>
                        <input type="hidden" name="PassedProjectId" value="<?= $WorkingProject[0]['ID'] ?>">
                    </form>
                    <form method="POST" action="editproject.php">
                        <!-- <button class="btn btn-primary d-grid" name="Remove">Remove</button> -->
                        <!-- <input type="hidden" name="PassedProjectId" value="<?= $WorkingProject[0]['ID'] ?>"> -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#removemodal">
                            Remove
                        </button>
                        <!-- Remove Modal -->
                        <div class="modal fade" id="removemodal" tabindex="-1" aria-labelledby="removemodalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="removemodalLabel">Confirme Remove</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure about that ?
                                    </div>
                                    <div class="modal-footer">
                                    <button class="btn btn-primary d-grid" name="Remove">Remove</button>
                                    <input type="hidden" name="PassedProjectId" value="<?= $WorkingProject[0]['ID'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dp = new DayPilot.Gantt("dp");
        let currentDate = new Date().toJSON().slice(0, 10);
        dp.startDate = new DayPilot.Date(currentDate);
        dp.days = 30;
        dp.linkBottomMargin = 5;
        dp.rowCreateHandling = 'Enabled';
        dp.columns = [
            { name: "Name", display: "text", width: 100 },
            { name: "Duration", width: 100 }
        ];
        dp.height = 400;
        dp.onBeforeRowHeaderRender = (args) => {
            args.row.columns[1].html = args.task.duration().toString("d") + " days";
            args.row.areas = [
                {
                    right: 3,
                    top: 3,
                    width: 16,
                    height: 16,
                    style: "cursor: pointer; box-sizing: border-box; background: white; border: 1px solid #ccc; background-repeat: no-repeat; background-position: center center; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAABASURBVChTYxg4wAjE0kC8AoiFQAJYwFcgjocwGRiMgPgdEP9HwyBFDkCMAtAVY1UEAzDFeBXBAEgxQUWUAgYGAEurD5Y3/iOAAAAAAElFTkSuQmCC);",
                    action: "ContextMenu",
                    menu: taskMenu,
                    v: "Hover"
                }
            ];
        };

        dp.contextMenuLink = new DayPilot.Menu([
            {
                text: "Delete",
                onClick: async (args) => {
                    const id = args.source.id();
                    await DayPilot.Http.post("../view/Gantt/gantt_link_delete.php", { id });
                    loadLinks();
                }
            }
        ]);

        dp.onRowCreate = async (args) => {

            const data = {
                name: args.text,
                start: dp.startDate,
                end: dp.startDate.addDays(1)
            };
            await DayPilot.Http.post("../view/Gantt/gantt_task_create.php", data);
            loadTasks();

        };

        dp.onTaskMove = async (args) => {

            const data = {
                id: args.task.id(),
                start: args.newStart,
                end: args.newEnd
            };

            await DayPilot.Http.post("../view/Gantt/gantt_task_move.php", data);
            dp.message("Updated");

        };

        dp.onTaskResize = async (args) => {

            const data = {
                id: args.task.id(),
                start: args.newStart,
                end: args.newEnd
            };

            await DayPilot.Http.post("../view/Gantt/gantt_task_move.php", data);
            dp.message("Updated");

        };


        dp.onRowMove = async (args) => {

            const data = {
                source: args.source.id(),
                target: args.target.id(),
                position: args.position
            };

            await DayPilot.Http.post("../view/Gantt/gantt_row_move.php", data);
            dp.message("Updated");

        };

        dp.onLinkCreate = async (args) => {
            const data = {
                from: args.from,
                to: args.to,
                type: args.type
            };
            await DayPilot.Http.post("../view/Gantt/gantt_link_create.php", data);
            loadLinks();
        };

        dp.onTaskClick = async (args) => {

            if (args.task.type() === "Group") {

                const modal = DayPilot.Modal.prompt("Name:", args.task.text());

                if (modal.canceled) {
                    return;
                }

                const data = {
                    id: args.task.data.id,
                    name: args.task.data.text,
                    start: args.task.data.start,
                    end: args.task.data.end,
                    complete: args.task.data.complete,
                    milestone: false
                };

                await DayPilot.Http.post("../view/Gantt/gantt_task_update.php", data);

                args.task.data.text = modal.result;
                dp.tasks.update(args.task);

                return;
            }

            const durations = [];
            for (let i = 1; i <= 10; i++) {
                durations.push({
                    name: i + " day" + ((i > 1) ? "s" : ""),
                    id: i
                });
            }

            const completes = [];
            for (let i = 0; i <= 100; i += 10) {
                completes.push({
                    name: i + "%",
                    id: i
                });
            }

            const form = [
                { name: "Name", id: "text" },
                { name: "Start", id: "start", dateFormat: "M/d/yyyy" },
                {
                    name: "Type", id: "type", type: "radio", options: [
                        {
                            name: "Task", id: "task", children: [
                                { name: "Duration", id: "duration", options: durations },
                                { name: "Complete", id: "complete", options: completes },
                            ]
                        },
                        { name: "Milestone", id: "milestone" }
                    ]
                }
            ];

            const formData = {
                id: args.task.data.id,
                text: args.task.text(),
                start: args.task.start(),
                complete: args.task.complete(),
                type: args.task.type().toLowerCase(),
                duration: args.task.duration().totalDays()
            };

            const modal = await DayPilot.Modal.form(form, formData);


            if (modal.canceled) {
                return;
            }

            const data = args.task.data;
            const result = modal.result;

            data.id = result.id;
            data.text = result.text;
            data.start = result.start;

            if (result.type === "task") {
                data.end = new DayPilot.Date(result.start).addDays(result.duration);
                data.complete = result.complete;
                data.type = "Task";
            }
            else {
                data.type = "Milestone";
            }

            const postData = {
                id: data.id,
                name: data.text,
                start: data.start,
                end: data.end,
                complete: data.complete,
                milestone: data.type === "Milestone"
            }

            await DayPilot.Http.post("../view/Gantt/gantt_task_update.php", postData);
            dp.tasks.update(args.task);

        };

        dp.init();

        loadTasks();
        loadLinks();

        function loadTasks() {
            dp.tasks.load("../view/Gantt/gantt_tasks.php");
        }

        function loadLinks() {
            dp.links.load("../view/Gantt/gantt_links.php");
        }

        const taskMenu = new DayPilot.Menu({
            items: [
                {
                    text: "Delete",
                    onClick: async (args) => {
                        const id = args.source.id();
                        await DayPilot.Http.post("../view/Gantt/gantt_task_delete.php", { id });
                        loadTasks();
                    }
                }
            ]
        });
    </script>
</body>

</html>