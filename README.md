Install extension

Add TSConfig:

```
mod.web_layout.BackendLayoutsDefault_for_content_defender_mod.allowed {
	CType := addToList(menu_pages)
	CType := addToList(menu_subpages)
	CType := addToList(shortcut)
	CType := addToList(text)
	CType := addToList(textmedia)
	CType := addToList(textpic)
	CType := addToList(uploads)
}
```

Clear cache
