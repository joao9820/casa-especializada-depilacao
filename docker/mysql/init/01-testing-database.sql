-- Banco separado para os testes (RefreshDatabase apaga as tabelas a cada execução)
-- Só roda na primeira subida do volume db-data
CREATE DATABASE IF NOT EXISTS casa_depilacao_testing;
GRANT ALL PRIVILEGES ON casa_depilacao_testing.* TO 'casa'@'%';
