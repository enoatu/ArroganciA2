DROP TABLE IF EXISTS texts;

CREATE TABLE texts (
        id            INT UNSIGNED  NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID',
        url           CHAR(32)      NOT NULL                            COMMENT 'ユニークURL',
        text          VARCHAR(5000) NOT NULL                            COMMENT '入力テキスト',
        created_on    TIMESTAMP     NOT NULL                            COMMENT '作成日時'
) ENGINE = InnoDB CHARSET = utf8 COMMENT = 'textsテーブル';

