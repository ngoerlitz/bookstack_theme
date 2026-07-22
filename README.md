# VATGER Theme

Add to `package.json`:
```
"build:vatger_css:dev": "sass ./themes/vatger/sass/:./themes/vatger/public/dist --embed-sources",
"build:vatger_css:watch": "sass ./themes/vatger/sass/:./themes/vatger/public/dist --watch --embed-sources",
"build:vatger_css:production": "sass ./themes/vatger/sass/:./themes/vatger/public/dist -s compressed",
```