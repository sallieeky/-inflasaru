
INSERT INTO arsips (`no_arsip`, `lokasi`, `tipe`, `created_at`, `updated_at`) VALUES 
('AS_0012','awdawdawda','sm','2022-05-22 02:17:30','2022-05-22 02:17:53');

INSERT INTO arsips (`no_arsip`, `lokasi`, `tipe`, `created_at`, `updated_at`) VALUES 
('SM_1231','awdawd','sk','2022-05-22 02:18:00','2022-05-22 02:18:00');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('PELAYANAN UMUM','2022-05-22 02:07:07','2022-05-22 02:07:07');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('TATA PEMERINTAHAN','2022-05-22 02:07:07','2022-05-22 02:07:07');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('PEMBERDAYAAN MASYARAKAT','2022-05-22 02:07:07','2022-05-22 02:07:07');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('UMUM','2022-05-22 02:07:07','2022-05-22 02:07:07');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('PEREKANAN DAN KEUANGAN','2022-05-22 02:07:07','2022-05-22 02:07:07');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('PSDA','2022-05-22 02:07:07','2022-05-22 02:07:07');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('TRANTIB','2022-05-22 02:07:07','2022-05-22 02:07:07');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('UMUM','2022-05-22 02:07:07','2022-05-22 02:07:07');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('PELAYANAN UMUM','2022-05-22 00:04:05','2022-05-22 00:04:05');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('TATA PEMERINTAHAN','2022-05-22 00:04:06','2022-05-22 00:04:06');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('PEMBERDAYAAN MASYARAKAT','2022-05-22 00:04:06','2022-05-22 00:04:06');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('UMUM','2022-05-22 00:04:06','2022-05-22 00:04:06');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('PEREKANAN DAN KEUANGAN','2022-05-22 00:04:06','2022-05-22 00:04:06');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('PSDA','2022-05-22 00:04:06','2022-05-22 00:04:06');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('TRANTIB','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO subbagians (`nama`, `created_at`, `updated_at`) VALUES 
('UMUM','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO surat_keluars (`no_surat`, `tgl_dikirim`, `tujuan`, `perihal`, `id_disposisi`, `lampiran`, `id_arsip`, `created_at`, `updated_at`) VALUES 
('AWDAWd','2022-05-08','awdAWD','ajdjakwd','3','10191077.pdf','2','2022-05-22 02:18:20','2022-05-22 02:18:36');

INSERT INTO surat_keluars (`no_surat`, `tgl_dikirim`, `tujuan`, `perihal`, `id_disposisi`, `lampiran`, `id_arsip`, `created_at`, `updated_at`) VALUES 
('SK_00123','2022-05-22','WDAD','AKWD','5','3724-13245-2-PB (2).pdf','','2022-05-22 00:22:13','2022-05-22 00:27:41');

INSERT INTO surat_masuks (`no_surat`, `tgl_diterima`, `asal`, `perihal`, `id_disposisi`, `lampiran`, `id_arsip`, `created_at`, `updated_at`) VALUES 
('SM_001','2022-05-22','Bontang','Tes Aja','10','10191077.pdf','1','2022-05-22 02:16:17','2022-05-22 02:17:40');

INSERT INTO surat_masuks (`no_surat`, `tgl_diterima`, `asal`, `perihal`, `id_disposisi`, `lampiran`, `id_arsip`, `created_at`, `updated_at`) VALUES 
('AWDAW','2022-05-24','ADWWD','ADn','1','10191077.pdf','','2022-05-22 02:17:16','2022-05-22 02:17:16');

INSERT INTO surat_masuks (`no_surat`, `tgl_diterima`, `asal`, `perihal`, `id_disposisi`, `lampiran`, `id_arsip`, `created_at`, `updated_at`) VALUES 
('AWD','2022-05-22','AWd','dawd','10','Surat Edaran UAS Genap 2021.pdf','','2022-05-22 00:05:38','2022-05-22 00:18:41');

INSERT INTO users (`foto`, `nama`, `role`, `email`, `username`, `email_verified_at`, `id_subbagian`, `password`, `notelp`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES 
('default_user.png','Admin','admin','admin@gmail.com','admin','','1','$2y$10$Z0r7JlVmjoowmhl.15pd4eR3UQST0TzYt8nHDWqC0FtmmBL6OcVua','08123456789','Jl. Kebon Jeruk No. 1','','2022-05-22 02:07:06','2022-05-22 02:07:06');

INSERT INTO users (`foto`, `nama`, `role`, `email`, `username`, `email_verified_at`, `id_subbagian`, `password`, `notelp`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES 
('DSC_0005.JPG','User 1','user','user1@gmail.com','user1','','6','$2y$10$dEcCeCIZrffhua4sZfkYuei4ZwqrrxR4Azg1BwOpg7qkewFv1iHtO','08123456789','Jl. Kebon Jeruk No. 1','','2022-05-22 02:07:07','2022-05-22 02:15:50');

INSERT INTO users (`foto`, `nama`, `role`, `email`, `username`, `email_verified_at`, `id_subbagian`, `password`, `notelp`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES 
('default_user.png','User 2','user','user2@gmail.com','user2','','1','$2y$10$gVJ84lZUv2DT8wIrKhXsde1MyvUc05rmXqJhbZVe7wR6C7TgtvXVO','08123456789','Jl. Kebon Jeruk No. 1','','2022-05-22 02:07:07','2022-05-22 02:07:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('PELAYANAN UMUM','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('TATA PEMERINTAHAN','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('PEMBERDAYAAN MASYARAKAT','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('PEREKANAN DAN KEUANGAN','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('PSDA','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('TRANTIB','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('UMUM','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('KEPALA CAMAT','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('SEKTRETARIS CAMAT','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('SELESAI','2022-05-22 02:07:08','2022-05-22 02:07:08');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('PELAYANAN UMUM','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('TATA PEMERINTAHAN','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('PEMBERDAYAAN MASYARAKAT','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('PEREKANAN DAN KEUANGAN','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('PSDA','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('TRANTIB','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('UMUM','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('KEPALA CAMAT','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('SEKTRETARIS CAMAT','2022-05-22 00:04:07','2022-05-22 00:04:07');

INSERT INTO disposisis (`nama`, `created_at`, `updated_at`) VALUES 
('SELESAI','2022-05-22 00:04:08','2022-05-22 00:04:08');
