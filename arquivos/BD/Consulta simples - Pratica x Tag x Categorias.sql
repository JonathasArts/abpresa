SELECT p.titulo_pratica PRATICA, t.descricao_tag TAG, c.titulo_categoria CATEGORIA FROM praticas p
INNER JOIN tags_has_praticas tp ON tp.praticas_id = p.id
INNER JOIN tags t ON t.id = tp.tags_id
INNER JOIN categorias c ON c.id = p.categorias_id
--WHERE p.titulo_pratica = 'Reuniões Diárias'
--WHERE t.descricao_tag = 'XP'
WHERE c.titulo_categoria = 'SCRUM'