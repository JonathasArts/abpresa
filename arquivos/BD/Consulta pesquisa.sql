SELECT p.* FROM praticas p 
INNER JOIN tags_has_praticas tp ON tp.praticas_id = p.id
INNER JOIN tags t ON t.id = tp.tags_id
WHERE UPPER(p.titulo_pratica) LIKE UPPER('%p%')
AND p.categorias_id = 2
ORDER BY titulo_pratica ASC