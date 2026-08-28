import os

ci3_path = "ci3_source"

controllers = []
models = []
views = []
config_files = []
libraries = []
helpers = []

for root, dirs, files in os.walk(os.path.join(ci3_path, "application")):
    for file in files:
        if file.endswith(".php"):
            path = os.path.relpath(os.path.join(root, file), ci3_path)
            if "controllers" in path:
                controllers.append(path)
            elif "models" in path:
                models.append(path)
            elif "views" in path:
                views.append(path)
            elif "config" in path:
                config_files.append(path)
            elif "libraries" in path:
                libraries.append(path)
            elif "helpers" in path:
                helpers.append(path)

with open("MIGRATION_AUDIT.md", "w") as f:
    f.write("# MIGRATION AUDIT\n\n")

    f.write("## Controllers\n")
    for c in controllers: f.write(f"- {c}\n")

    f.write("\n## Models\n")
    for m in models: f.write(f"- {m}\n")

    f.write("\n## Views\n")
    for v in views: f.write(f"- {v}\n")

    f.write("\n## Configs\n")
    for c in config_files: f.write(f"- {c}\n")

    f.write("\n## Libraries\n")
    for l in libraries: f.write(f"- {l}\n")

    f.write("\n## Helpers\n")
    for h in helpers: f.write(f"- {h}\n")
