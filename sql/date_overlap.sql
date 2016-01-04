CREATE OR REPLACE FUNCTION date_overlap(start1 date, end1 date, start2 date, end2 date) RETURNS int STRICT AS '

  -- STRICT returns NULL if any input is NULL

  BEGIN

    -- for valid ranges, end1 must be after (or equal to) start1, end2 must be after (or equal to) start2
    -- for valid overlap, either end1 is after (or equal to) start2 or end2 is after (or equal to) start1

    IF end1 < start1 OR end2 < start2 OR start1 < start2 AND end1 <= start2 OR start2 < start1 AND end2 <= start1 THEN
      RETURN NULL;
    ELSE
      IF start1 > start2 THEN
        IF end1 < end2 THEN
          RETURN 1;
        ELSE
          RETURN 1;
        END IF;
      ELSE
        IF end2 < end1 THEN
          RETURN 1;
        ELSE
          RETURN 1;
        END IF;
      END IF;
    END IF;
  END;
' LANGUAGE 'plpgsql'