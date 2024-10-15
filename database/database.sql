-- Inserir dados na tabela users
INSERT INTO users (name, email, password, created_at, updated_at) VALUES
('Ricardo Silva', 'ricardo@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()), -- Senha: password
('Maria Oliveira', 'maria@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()), -- Senha: password
('João Pereira', 'joao@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()); -- Senha: password

-- Inserir dados na tabela services
INSERT INTO services (name, slug, has_plan, created_at, updated_at) VALUES
('Operadora de Celular', 'operadora', TRUE, NOW(), NOW()),
('Seguro de Saúde', 'seguro', TRUE, NOW(), NOW()),
('Energia Elétrica', 'energia', FALSE, NOW(), NOW());

-- Inserir dados na tabela plans
INSERT INTO plans (service_id, name, price, created_at, updated_at) VALUES
(1, 'Plano Básico', 99.99, NOW(), NOW()),
(1, 'Plano Intermediário', 109.99, NOW(), NOW()),
(1, 'Plano Avançado', 149.99, NOW(), NOW()),
(2, 'Pacote Básico', 89.99, NOW(), NOW()),
(2, 'Pacote Intermediário', 109.99, NOW(), NOW()),
(2, 'Pacote Premium', 129.99, NOW(), NOW());

-- Inserir dados na tabela user_service
INSERT INTO user_service (user_id, service_id, plan_id) VALUES
(1, 1, 1),  -- Ricardo Silva usa o serviço de Internet com o Plano Básico
(1, 2, 2),  -- Ricardo Silva usa o serviço de TV a Cabo com o Pacote Premium
(2, 1, 2),  -- Maria Oliveira usa o serviço de Internet com o Plano Avançado
(3, 3, NULL);  -- João Pereira usa o serviço de Telefone sem plano
