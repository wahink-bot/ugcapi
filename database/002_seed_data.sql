-- 002_seed_data.sql

INSERT IGNORE INTO academic_ranks (name, code, description, level) VALUES
('Assistant Professor', 'ASSISTANT_PROFESSOR', 'Early-career academic rank', 1),
('Associate Professor', 'ASSOCIATE_PROFESSOR', 'Mid-career academic rank', 2),
('Full Professor', 'FULL_PROFESSOR', 'Senior academic rank', 3);

INSERT IGNORE INTO academic_frameworks (name, code, short_name, year) VALUES
('UGC API 2018', 'UGC_API_2018', 'UGC API 2018', 2018),
('UGC API 2025', 'UGC_API_2025', 'UGC API 2025', 2025),
('BSUSC 2026', 'BSUSC_2026', 'BSUSC 2026', 2026),
('JPSC 2026', 'JPSC_2026', 'JPSC 2026', 2026);
